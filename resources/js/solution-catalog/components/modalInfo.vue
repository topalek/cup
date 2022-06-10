<template>
    <div
        :class="status"
        class="modal modal--info"
        @click.self="closeModal"
    >
        <div class="modal__wrap">
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
            <div class="modal-body" v-html="message"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        status: 'success',
        message: ''
    },
    methods: {
        closeModal() {
            this.$emit('closeModal')
        }
    }
}
</script>

<style scoped>
.modal__wrap {
    max-width: 835px;
    padding: 50px 50px 30px;
    max-height: 80vh;
    overflow: hidden;
    font-size: 2rem;
}

.success {
    color: #31a829;
}

.danger {
    color: #a82929;
}

.modal-body {
    display: flex;
    flex-direction: column;
    place-content: center;
}
</style>
