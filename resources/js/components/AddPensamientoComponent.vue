<template>
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">Ingresar pensamiento</div>
            <div class="card-body">
                <form action="" v-on:submit.prevent="nuevoPensamiento()">
                    <div class="form-group">
                        <label for="pensamiento">Ahora estoy pensando en: </label>
                        <input type="text" name="pensamiento" id="pensamiento" class="form-control" v-model="descripcion">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar pensamiento</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                descripcion:''
            }
        },

        methods: {
            nuevoPensamiento(){
                const params = {
                    descripcion : this.descripcion
                };

                axios.post('/pensamientos', params).then((response) => {
                    const pensamiento = response.data;
                    this.$emit('nuevo', pensamiento);
                });

                this.descripcion = '';
            }
        },

        mounted() {

        }
    }
</script>
