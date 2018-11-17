<template>
    <div>
        <!-- <pre>{{$data.form}}</pre> -->
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-between nav-controls">
                <h5>Crear nueva ordén</h5>
            </div>
            <div class="col-sm-8">
                <h5>Pedido</h5>
                <div class="__container-pizzas">
                    <div class="__header-pizzas">
                        Listado de pizzas disponibles
                        <br>
                        <small>Presiona para agregar a pedido</small>
                    </div>
                    <div class="__body-pizzas d-flex">
                        <div class="container_item_pizza d-fill text-center"
                        v-for="pizza in pizzasOn" :key="pizza.id"
                        @click="addtoOrder(pizza)">
                            <img src="img/pizza_item.png">
                            <label class="pizza_name d-block">{{pizza.name_pizza}} </label>
                            <label class="label-bold">$ {{pizza.price}}</label>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <td>Pizza</td>
                        <td>Monto</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <tr v-for="(pizza, index) in form.listPizza" :key="index">
                            <td>{{pizza.name_pizza}}</td>
                            <td>{{pizza.price}}</td>
                            <td><button class="btn btn-sm btn-danger" @click="removeOrder(pizza)"><span class="fas fa-times"></span> Remover</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <h5>Detalle de caja</h5>
                <!-- <input type="hidden" name="" id="valueid_profile" :value="$gate.idProfile()" ref="idvalue"> -->
                <div class="form-group">
                    <label for="profile">Cajero</label>
                    <input type="text" :value="$gate.nameProfile()" class="form-control" id="profile" readonly>
                </div>
                <div class="form-group">
                    <label for="pizzas">Total de pizzas</label>
                    <input type="text" class="form-control" id="pizzas" :value="countPizza" readonly>
                </div>

                <div class="__pay">
                    <div class="form-group">
                        <label for="mont">Total a pagar</label>
                        <input type="text" class="form-control" id="mont" :value="countTotal" readonly>
                    </div>
                    <p>Para cobrar la venta asegurate de que hayas seleccionado las pizzas correctamente.</p>
                    <button class="btn btn-lg btn-success" v-if="form.listPizza.length > 0" :disabled="form.busy" @click="storeOrder()">Procesar pago</button>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            pizzasOn: {},
            countPizza: 0,
            countTotal: 0,
            form: new Form({
                iduser: 1,
                total: 0,
                pizzas: 0,
                listPizza: []
            }),
        }
    },
    watch:{
        countPizza: function() {
            this.form.pizzas = this.countPizza
        },
        countTotal: function() {
            this.form.total = this.countTotal
        }
    },
    created(){
        axios.get('api/pizza')
        .then(({data}) => {
           this.pizzasOn = data.data
        })
        .catch((err) => {
            console.log(err)
        })
    },
    methods:{
        addtoOrder(pizza){
            console.log(pizza)
            this.form.listPizza.push(pizza)
            this.countPizza ++
            this.countTotal += pizza.price
        },
        removeOrder: function (pizza) {
            var index = this.form.listPizza.indexOf(pizza)
            this.form.listPizza.splice(index, 1)
             this.countPizza --
             this.countTotal -= pizza.price
        },
        storeOrder(){
            this.form.post('api/order')
            .then(({data}) => {
                // console.log(res)
                toastr.success(data.message)
                this.form.reset()
                this.countPizza = 0
                this.countTotal = 0
            })
            .catch((err) => {
                console.log(err)
            })
        }
    }
}
</script>

<style>
    .__container-pizzas{
        padding: 10px 10px;
        background: #eee;
        border-radius: 5px;
        border-bottom: 2px solid #ffdd77;
    }
    .__container-pizzas  .__header-pizzas{
        padding: 5px;
    }
    .__container-pizzas .__body-pizzas{
        padding: 10px 0;
    }
    .container_item_pizza{
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #3f4a54;
        cursor: pointer;
        margin-right: 2px;
        background-color: #ffdd77;
        min-width: 100px;
    }
</style>

