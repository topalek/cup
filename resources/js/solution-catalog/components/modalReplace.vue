<template>
    <div
        class="modal modal--replace"
        @click.self="closeModal"
    >
        <div class="modal__wrap">
            <div class="modal__title">Заменить</div>
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
                1. {{ product.name }}
            </div>
            <div class="modal__items">
                <modal-replace-item
                    v-for="item in product.products"
                    :id="item.id"
                    :key="item.id"
                    v-model="replaceProduct"
                    :img="item.image"
                    :title="item.name"
                    @replaceItem="replaceItem(item.id)"
                />
                <div class="modal__item modal__item--another">
                    <input id="another_product" v-model="replaceProduct" name="product" type="radio"/>
                    <label for="another_product">
                        <div class="modal__item-wrap">
                            <div class="modal__item-title">Другое блюдо</div>
                            <div class="modal__item-text">
                                Отметьте этот пункт, если вы не смогли выбрать из предложенных
                                вариантов.
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import modalReplaceItem from "./modalReplaceItem";

export default {
    components: {
        modalReplaceItem
    },
    props: {
        product: {}
    },
    data() {
        return {
            replaceProduct: null
        }
    },
    watch: {
        replaceProduct(value) {
            this.$emit('replaceItem', value)
        }
    },

    methods: {
        closeModal() {
            this.$emit('closeModal')
        },

    }
}
</script>

<style scoped>

</style>
