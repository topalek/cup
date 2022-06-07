<template>
    <div
        class="modal modal--replace"
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
            <div class="modal__product">
                <div class="input-group">
                    <label>Поиск</label>
                    <input v-model="productTitle" type="text">
                </div>
            </div>
            <div class="modal__items">
                <modal-add-item
                    v-for="item in products"
                    :id="item.id"
                    :key="item.id"
                    :img="item.image"
                    :title="item.name"
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
            axios.get('/api/add-product/' + search).then(resp => {
                this.products = resp.data
            })

        }, closeModal() {
            this.$emit('closeAddModal')
        },
    }
}
</script>

<style scoped>

</style>
