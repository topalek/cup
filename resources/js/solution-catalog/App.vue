<template>
    <section id="solution-catalog" class="solution-catalog">
        <div class="container">
            <h2>Состав готового решения</h2>
            <div class="solution-catalog__tabs">
                <div
                    v-for="(tab, i) in tabs"
                    :key="i"
                    :class="{ active: tab.active }"
                    class="solution-catalog__tab"
                    @click="changeTab(i)">
                    {{ tab.label }}
                </div>
            </div>
            <div class="solution-catalog__wrap">
                <div class="solution-catalog__list">
                    <solution-item v-for="item in activeTab.products"
                                   :key="item.id"
                                   :class="{ active: item.active }"
                                   :product="item"
                                   @changeInfo="changeInfo"
                                   @deleteItem="deleteZap"
                                   @openModal="openModal"
                    />

                    <a class="solution-catalog__add" href="javascript:void(0);" @click="openAddModal"
                    >Добавить</a
                    >
                </div>
                <div class="solution-catalog__info">
                    <div class="solution-catalog__image">
                        <img :src="currentDish.image" alt="555"/>
                    </div>
                    <div class="solution-catalog__compound">
                        <div class="solution-catalog__compound-title">Состав:</div>
                        <div class="solution-catalog__compound-text" v-html="currentDish.compound">
                        </div>
                    </div>
                    <div class="solution-catalog__card" @click="SendDataPage">в корзину</div>
                </div>
            </div>
        </div>
        <modal-replace
            v-if="showModal"
            :class="{'modal--active':showModal}"
            :product="modalData"
            @closeModal="closeModal"
            @replaceItem="changeDish"
        />
        <modal-add
            v-if="showAddModal"
            :class="{'modal--active':showAddModal}"
            @addProduct="addProduct"
            @closeAddModal="closeAddModal"
        />
    </section>
</template>

<script>
import axios from "axios";
import solutionItem from "./components/solutionItem";
import modalReplace from "./components/modalReplace";
import modalAdd from "./components/modalAdd";

export default {
    components: {
        modalAdd,
        solutionItem,
        modalReplace
    },
    data: () => ({
        Pages: null,
        currentProduct: {},
        currentDish: {},
        activeTab: {},
        tabs: [],
        products: [],
        product: {},
        showModal: false,
        showAddModal: false,
    }),
    methods: {
        /* ВЫБОРКА ИНФОРМАЦИИ ПО СТРАНИЦЕ ИЗ API */
        loadDataPage(url) {
            axios.get('/api/menuprod/' + url)
                .then(res => {
                    this.Pages = res.data;
                    this.tabs = res.data.tabs
                    this.activeTab = this.tabs[0]
                    let activeTabProducts = this.activeTab.products
                    this.currentDish = activeTabProducts[this.firstProdId()]
                })
        },
        openModal(id) {
            axios.get('/api/replace-product/' + id).then(resp => {
                if (resp.data.status) {
                    this.product = resp.data.product
                    this.showModal = true
                }

            })
        },
        closeModal() {
            this.showModal = false
        },
        closeAddModal() {
            this.showAddModal = false
        },
        openAddModal() {
            this.showAddModal = true
        },
        changeTab(idx = null) {
            if (!idx) {
                idx = Object.keys(this.tabs)[0]
            }
            for (let i in this.tabs) {
                this.tabs[i].active = false
            }
            this.tabs[idx].active = true
            this.activeTab = this.tabs[idx]
        },
        changeInfo(id = null) {
            if (!id) {
                id = this.firstProdId()
            }
            for (let t in this.tabs) {
                for (let i in this.tabs[t].products) {
                    this.tabs[t].products[i].active = false
                }
            }
            this.tabs[this.activeTab.idx].products[id].active = true
            this.activeTab.products[id].active = true
            this.currentDish = this.activeTab.products[id]
        },
        addProduct(id) {
            axios.get('/api/add-product/' + id)
                .then(res => {
                    let prod = res.data.data;
                    let prodId = prod.id
                    this.tabs[this.activeTab.idx].products[prodId] = {...prod}
                    this.activeTab = this.tabs[this.activeTab.idx]
                })
        },

        SendDataPage() {
            let existingObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            /*Формирование массива для передачи*/
            let formData = new FormData();
            let productsvr = [];
            let permas = 0;
            for (let j = 0; j < this.products.length; j++) {
                let productsvr2 = this.products[j].info;
                for (let j2 = 0; j2 < productsvr2.length; j2++) {
                    productsvr[permas] = productsvr2[j2].id;
                    permas++;
                }
            }
            productsvr.forEach(function (value) {
                formData.append("productsvr[]", value)
            })

            axios.post('/addToCartGot', formData, config)
                .then(function (res) {
                    existingObj.output2 = res.data.output;
                })
                .catch(function (err) {
                    existingObj.output2 = 'Ошибка заполнение формы';
                });
        },

        deleteZap(id) {
            delete this.tabs[this.activeTab.idx].products[id]
            this.activeTab = this.tabs[this.activeTab.idx]
            if (Object.keys(this.activeTab.products).length) {
                this.changeInfo(this.firstProdId())
                return
            }
            this.activeTab.products = []

        },
        firstProdId() {
            return Object.keys(this.activeTab.products)[0]
        }
    },
    computed: {
        modalData() {
            return this.product
        },
    },
    mounted() {
        var segment_str = window.location.href;
        var segment_array = segment_str.split('/');
        var last_segment = segment_array.pop();
        this.loadDataPage(last_segment);
    },
};
</script>
