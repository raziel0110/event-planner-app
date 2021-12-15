<template>
    <div class="container mt-3 ml-3">
        <div class="d-flex justify-content-between">
            <h1 class="display-6">Customers</h1>
            <div>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Add
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Customers',
    data() {
        return {

        }
    }
}
</script>
<style scoped>
    .btn {
        display: block;
        height: 38px;
        width: 100px;
        border-radius: 20px 20px 20px 20px;
        font-size: 16px;
    }
</style>