<template>
    <div
        class="solution-catalog__product"
        @click.self="changeInfo(product.id)"
    >
        <div class="solution-catalog__product-title">
            {{ product.title }}
        </div>
        <div class="solution-catalog__product-icons">
            <div
                class="solution-catalog__product-icon solution-catalog__product-icon--replace"
                @click="openModal(product.id)"
            >
                <svg
                    fill="none"
                    height="23"
                    viewBox="0 0 23 23"
                    width="23"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M10 4H3C2.46957 4 1.96086 4.21071 1.58579 4.58579C1.21071 4.96086 1 5.46957 1 6V20C1 20.5304 1.21071 21.0391 1.58579 21.4142C1.96086 21.7893 2.46957 22 3 22H17C17.5304 22 18.0391 21.7893 18.4142 21.4142C18.7893 21.0391 19 20.5304 19 20V13"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                    />
                    <path
                        d="M17.5 2.49998C17.8978 2.10216 18.4374 1.87866 19 1.87866C19.5626 1.87866 20.1022 2.10216 20.5 2.49998C20.8978 2.89781 21.1213 3.43737 21.1213 3.99998C21.1213 4.56259 20.8978 5.10216 20.5 5.49998L11 15L7 16L8 12L17.5 2.49998Z"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                    />
                </svg>
            </div>
            <div
                class="solution-catalog__product-icon solution-catalog__product-icon--delete"
                @click="deleteItem(product.id)"
            >
                <svg
                    fill="none"
                    height="21"
                    viewBox="0 0 17 21"
                    width="17"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M1.75 18.375C1.75 19.6125 2.7625 20.625 4 20.625H13C14.2375 20.625 15.25 19.6125 15.25 18.375V4.875H1.75V18.375ZM4 7.125H13V18.375H4V7.125ZM12.4375 1.5L11.3125 0.375H5.6875L4.5625 1.5H0.625V3.75H16.375V1.5H12.4375Z"
                    />
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: {},
    },
    methods: {
        deleteItem(id) {
            this.$emit('deleteItem', id)
        },
        openModal(id) {
            this.$emit('openModal', id)
        },
        changeInfo(id) {
            this.$emit('changeInfo', id)
        }
    }

}
</script>

<style scoped>

</style>
