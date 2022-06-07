<template>
    <div
        class="solution-catalog__product"
    >
        <div class="solution-catalog__product-title">
            {{ id }}. {{ title }}
        </div>
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
    }
}
</script>

<style scoped>

</style>
