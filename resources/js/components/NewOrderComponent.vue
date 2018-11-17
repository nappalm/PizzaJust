<template>
    <div>
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
                    <div class="__body-pizzas">
                        <button class="btn btn-dark btn-sm mr-2" 
                        v-for="pizza in pizzasOn" :key="pizza.id"
                        @click="addtoOder(pizza)">
                        {{pizza.name_pizza}} $ {{pizza.price}}
                        </button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <td>#</td>
                        <td>Pizza</td>
                        <td>Monto</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <tr v-for="pizza in form.listPizza" :key="pizza.id">
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <h5>Detalle de caja</h5>
                <!-- <input type="hidden" name="" id="valueid_profile" :value="$gate.idProfile()" ref="idvalue"> -->
                <div class="form-group">
                    <label for="username">Cajero</label>
                    <input type="text" class="form-control" id="username" readonly>
                </div>
                <div class="form-group">
                    <label for="username">Total de pizzas</label>
                    <input type="text" class="form-control" id="username" :value="countPizza" readonly>
                </div>

                <div class="__pay">
                    <div class="form-group">
                        <label for="username">Total a pagar</label>
                        <input type="text" class="form-control" id="username" :value="countTotal" readonly>
                    </div>
                    <button class="btn btn-lg btn-success">Procesar pago</button>
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
                listPizza: []
            }),
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
        addtoOder(pizza){
            console.log(pizza)
            this.form.listPizza.push(pizza)
            this.countPizza ++
            this.countTotal += pizza.price
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
</style>

