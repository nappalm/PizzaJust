<template>
<div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-between nav-controls">
            <h5>Listado de ordenes</h5>
            <div class="_controls">
                <router-link to="/neworder" class="btn btn-sm btn-success">Crear una nueva orden <span class="fas fa-plus"></span></router-link>
            </div>
        </div>
        <div class="col-sm-6">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <h5 >
                    Ordenes en lista
                    </h5>
                </li>
                <li class="list-inline-item">
                    <pulse-loader :loading="loading" :color="'#3f4a54'" :size="'20px'"></pulse-loader>
                </li>
            </ul>
            
            <table class="table">
                <thead>
                    <td># orden</td>
                    <td>Usuario</td>
                    <td width="50">Pizzas</td>
                    <td width="50">Total</td>
                    <td>Fecha</td>
                </thead>
                <tbody>
                    <tr v-for="order in listOrders" :key="order.id" @click="clickOrder(order)">
                        <td>{{order.id}}</td>
                        <td>{{order.author}}</td>
                        <td>{{order.pizzas}}</td>
                        <td><span class="btn btn-warning btn-sm">${{order.total}}</span></td>
                        <td>{{order.created_at | timeDate}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <h5>Información de ordén</h5>
            <div class="__information_empty text-center pt-3" v-if="emptyOrder">
                <img src="img/empty_order.png" style="opacity: .7">
                <h5 class="text-muted">Selecciona una orden!</h5>
            </div>
            <table class="table" v-if="!emptyOrder">
                <thead>
                    <td>Pizza</td>
                    <td width="50">Precio</td>
                    <td width="50"></td>
                </thead>
                <tbody>
                    <row-item-order v-for="order in listOrderData" :key="order.id"
                    :id="order.id"
                    :pizza="order.pizza"
                    :price="order.price"
                    />
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            emptyOrder: true,
            listOrders: {},
            listOrderData: {},
            loading: false,
        }
    },
    methods: {
        async clickOrder(order){
            this.loading = true
            try {
                this.emptyOrder = false
                axios.get('api/order/'+order.id)
                .then(({data}) => {
                    this.listOrderData = data
                    this.loading = false
                })
                .catch((err) => {
                    console.warn(err)
                })
            }catch (error) {
                console.error(error);
            }
        },
        async loadingOrders(){
            this.loading = true
            try {
            axios.get('api/order')
                .then(({data}) => {
                    this.listOrders = data
                    this.loading = false
                })
                .catch((err) =>{
                    console.warn(err)
                })  
            }catch (error) {
                console.error(error);
            }
            
        }
        
    },
    created(){
        this.loadingOrders()
    }
}
</script>

<style>
 .table tbody tr{
     cursor: pointer;
 }
.table tbody tr:hover{
    background-color: #eee;
}
</style>

