<template>
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">Publicado el {{pensamiento.created_at}} || Actualizado el {{pensamiento.updated_at}}</div>

            <div class="card-body">
                <input v-if="modoEditar" type="text" class="form-control" v-model="pensamiento.descripcion">
                <p v-else>{{pensamiento.descripcion}}</p>
            </div>
            <div class="card-footer">
                <button v-if="modoEditar" type="button" class="btn btn-primary" v-on:click="onClickUpdate()">Guardar cambios</button>
                <button v-else type="button" class="btn btn-primary" v-on:click="onClickEdit()">Editar</button>
                <button type="button" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['pensamiento'],
        data(){
            return {
                modoEditar : false
            }
        },

        methods: {
            onClickDelete(){
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() => {
                    this.$emit('eliminar');
                });
            },
            onClickEdit(){
                this.modoEditar = true;
            },
            onClickUpdate(){
                const params = {
                    descripcion: this.pensamiento.descripcion
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`, params).then((response) => {
                    this.modoEditar = false;
                    const pensamiento = response.data;
                    this.$emit('actualizar', pensamiento);
                });
            }
        },

        mounted() {

        }
    }
</script>
