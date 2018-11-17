<template>
    <tr v-if="visible">
        <td>{{this.pizza}}</td>
        <td>{{this.price}}</td>
        <td>
            <!--Creacion funciones de eliminación para un caso más real -->
        </td>
    </tr>
</template>
<script>
export default {
    data(){
        return{
            form: new Form({
                id: ''
            }),
            visible: true
        }
    },
    props:{
        id: Number,
        pizza: String,
        price: Number,
    },
    methods:{
        // El siguiente codigo se implementaria en caso de que un usuario quisiera 
        // eliminar una orden, en este caso solo se quieren observar
        // revoveItemOder(){
        //     this.form.delete('api/order/'+this.id)
        //     .then((res) =>{
        //         console.log(res)
        //         this.visible = false
        //     }).catch((err) => {
        //         console.warn(err)
        //     })
        // }
    }
}
</script>

