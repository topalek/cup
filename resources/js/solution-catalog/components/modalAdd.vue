<template>
    <div
        class="modal modal--add"
        @click.self="closeModal"
    >
        <div class="modal__wrap">
            <div class="modal__title">Добавить</div>
            <div class="modal__close" @click="closeModal">
                <svg
                    fill="none"
                    height="31"
                    viewBox="0 0 31 31"
                    width="31"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M27.4246 30.0878L15.4996 18.1441L3.57461 30.0878L0.912109 27.4253L12.8559 15.5003L0.912109 3.57534L3.57461 0.912842L15.4996 12.8566L27.4246 0.931592L30.0684 3.57534L18.1434 15.5003L30.0684 27.4253L27.4246 30.0878Z"
                        fill="#E0E0E0"
                    />
                </svg>
            </div>
            <div class="modal__search">
                <input v-model="productTitle" placeholder="Поиск" type="text"/>
                <a class="modal__search-icon" href="#">
                    <svg
                        fill="none"
                        height="15"
                        viewBox="0 0 16 15"
                        width="16"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            clip-rule="evenodd"
                            d="M5.41847 0.0342498C4.01533 0.191486 2.76271 0.790285 1.77895 1.77402C0.824816 2.72819 0.224173 3.92804 0.0439679 5.23984C-0.0143914 5.66482 -0.0147136 6.50748 0.0433527 6.91606C0.190423 7.95103 0.595158 8.92046 1.23248 9.76433C1.46709 10.075 2.05329 10.6615 2.36272 10.8952C3.11111 11.4603 3.94654 11.8424 4.83297 12.0248C6.37103 12.3414 8.04171 12.0304 9.34609 11.1845L9.50538 11.0813L11.2632 12.8309C13.1867 14.7455 13.1689 14.7304 13.5829 14.8014C14.1213 14.8937 14.66 14.6147 14.8916 14.1236C15.0491 13.7896 15.0357 13.3292 14.8593 13.0098C14.8133 12.9267 14.1261 12.2162 12.9988 11.0866L11.2113 9.2952L11.3194 9.11725C11.6978 8.49428 11.9956 7.58502 12.0975 6.74107C12.1402 6.38754 12.1345 5.72543 12.0855 5.33294C11.8813 3.69815 11.0389 2.23263 9.73137 1.23727C8.52338 0.317697 6.90856 -0.132742 5.41847 0.0342498ZM6.5171 2.02579C7.96237 2.19803 9.18214 3.09305 9.77927 4.41944C10.4618 5.93552 10.1397 7.73218 8.97329 8.91615C8.25757 9.64263 7.39937 10.0485 6.39203 10.1369C4.72891 10.2828 3.12271 9.36135 2.38651 7.83894C2.22638 7.50779 2.06671 6.983 2.01925 6.63188C1.97354 6.29382 1.99766 5.55032 2.06416 5.24616C2.25479 4.37432 2.7347 3.56241 3.39013 3.00287C4.28067 2.24262 5.40045 1.89273 6.5171 2.02579Z"
                            fill="#5F5839"
                            fill-rule="evenodd"
                        />
                    </svg>
                </a>
            </div>
            <div class="modal__results">
                <modal-add-item
                    v-for="item in products"
                    :id="item.id"
                    :key="item.id"
                    :img="item.image"
                    :title="item.name"
                    @addProduct="addProduct"
                />
            </div>
        </div>
    </div>
</template>

<script>
import ModalAddItem from "./modalAddItem";
import axios from 'axios'

export default {
    components: {ModalAddItem},
    data() {
        return {
            productTitle: '',
            products: []
        }
    },

    watch: {
        productTitle(value) {
            this.loadData(value)
            return value
        }
    },
    methods: {
        loadData(search) {
            if (search !== '') {
                axios.get('/api/get-product-list/' + search).then(resp => {
                    this.products = resp.data
                })
            }


        }, closeModal() {
            this.$emit('closeAddModal')
        },
        addProduct(id) {
            this.$emit('addProduct', id)
        }
    }
}
</script>

<style scoped>

</style>
