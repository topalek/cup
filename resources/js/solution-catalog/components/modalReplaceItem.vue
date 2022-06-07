<template>
    <div class="modal__item">
        <input :id="'product-'+id" :value="id" name="product" type="radio"
               @input="$emit('input', $event.target.value)"/>
        <label :for="'product-'+id">
            <div class="modal__item-image">
                <img :src="img" alt=""/>
            </div>
            <div class="modal__item-wrap">
                <div class="modal__item-text">{{ title }}</div>
            </div>
        </label>
    </div>
</template>

<script>
export default {
    props: {
        img: {
            type: String,
            default: '/assets/img/personal-area-image-1.png',
        },
        id: {
            type: Number,
            default: null,
        },
        title: {
            type: String,
            default: '',
        }
    },
    methods: {
        selectReplacement(id) {
            this.$emit('replaceItem', id)
            this.$emit('input', id)
        }
    }
}
</script>

<style scoped>

</style>
