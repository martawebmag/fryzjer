<template>
    <div>
        <h1>{{ message }}</h1>
        <button @click="changeMessage">Kliknij mnie</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Witaj w Vue w Laravelu!"
        };
    },
    methods: {
        changeMessage() {
            this.message = "Działa!";
        }
    }
};
</script>