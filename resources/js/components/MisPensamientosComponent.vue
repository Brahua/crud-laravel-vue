<template>
    <div class="row justify-content-center">

        <add-pensamiento @nuevo="agregarPensamiento"></add-pensamiento>

        <pensamiento v-for="(pensamiento,index) in pensamientos" :key="pensamiento.id" :pensamiento="pensamiento" @eliminar="eliminarPensamiento(index)" @actualizar="actualizarPensamiento(index, ...arguments)"></pensamiento>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                pensamientos :[]
            }
        },

        methods: {
            agregarPensamiento(pensamiento) {
                this.pensamientos.push(pensamiento);
            },
            eliminarPensamiento(index){
                this.pensamientos.splice(index, 1);
            },
            actualizarPensamiento(index, pensamiento){
                this.pensamientos[index] = pensamiento;
            }
        },

        mounted() {
            axios.get('/pensamientos').then((response) => {
                this.pensamientos = response.data;
            })
        }
    }
</script>
