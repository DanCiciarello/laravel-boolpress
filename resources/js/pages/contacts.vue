<template>
<div>
    <div class="container py-5">

        <h1>Contatti</h1>

        <form @submit.prevent="onFormSubmit">
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome</label>
                <input class="form-control" id="inputName" type="text" placeholder="Inserisci il nome..." v-model="name" />
            </div>

            <div class="mb-3">
                <label for="inputText" class="form-label">Testo</label>
                <textarea id="inputText" class="form-control" cols="30" rows="10" placeholder="Inserisci un messaggio..."
                    v-model="message"
                ></textarea>
            </div>
    
            <button class="btn btn-success" type="submit">Invia</button>

        </form>
    </div>
</div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            name: "",
            message: "",
    };
    },
    methods: {
        onFormSubmit() {
            axios.post("/api/contacts", {
                name: this.name,
                message: this.message,
            });
        },
    },
};
</script>