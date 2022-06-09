<template>
    <div class="modal__results-item"
         @click="addProduct(id)"
    >
        {{ title }}
        <div class="modal__results-addbtn" @click="addProduct(id)">Добавить</div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: '',
        },
        id: {
            type: Number,
            default: '',
        }
    },
    methods: {
        addProduct(id) {
            this.$emit('addProduct', id)
        }
    }
}
</script>

<style scoped>

</style>
