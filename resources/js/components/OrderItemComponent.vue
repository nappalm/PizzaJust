<template>
    <tr v-if="visible">
        <td>{{this.pizza}}</td>
        <td>{{this.price}}</td>
        <td>
            <button class="btn btn-danger btn-sm" @click="revoveItemOder()"><span class="fas fa-times"></span></button>
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
        revoveItemOder(){
            this.form.delete('api/order/'+this.id)
            .then((res) =>{
                console.log(res)
                this.visible = false
            }).catch((err) => {
                console.warn(err)
            })
        }
    }
}
</script>

