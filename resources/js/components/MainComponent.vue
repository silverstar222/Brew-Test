<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button id="brew_btn" class="btn btn-primary pull-left" data-toggle="modal" data-target="#brew_modal">Brew</button>
                    </div>
                    <div class="card-body">
                        <TankComponent v-for="(tank, i) in tanks"
                        :key="i"
                        :amount="tank.amount"
                        :tank_name="tank.name"
                        />
                    </div>
                    <div class="card-footer">
                        <button id="move_btn" class="btn btn-success" data-toggle="modal" data-target="#move_modal">Move</button>
                        <button id="dump_btn" class="btn btn-secondary" data-toggle="modal" data-target="#dump_modal">Dump</button>
                        <button id="keg_btn" class="btn btn-custom" data-toggle="modal" data-target="#keg_modal">Keg</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="brew_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Brew</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="brew_target_tank">Tank</label>
                                <select name="brew_target_tank" id="brew_target_tank" v-model="brew_tanks.tank_id" class="form-control">
                                    <option value="">Choose...</option>
                                    <option v-for="(tank, i) in tanks"
                                    :key="i"
                                    :value="tank.id"
                                    >{{ tank.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brew_amount">Amount</label>
                                <input type="number" id="brew_amount" v-model="brew_tanks.amount" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" @click="brew">Save changes</button>
                </div>

                </div>
            </div>
        </div>

        <div class="modal" id="move_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Move</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10" :class="error ? 'show' : 'hide'">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> Amount is bigger than amount of the source tank.
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="brew_target_tank">Tank</label>
                                <select name="brew_target_tank" id="move" v-model="move_tanks.source_tank_id" class="form-control">
                                    <option value="">Choose Source Tank...</option>
                                    <option v-for="(tank, i) in tanks"
                                    :key="i"
                                    :value="tank.id"
                                    >{{ tank.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brew_target_tank">Tank</label>
                                <select name="brew_target_tank" id="move_target_tank" v-model="move_tanks.target_tank_id" class="form-control">
                                    <option value="">Choose Target Tank...</option>
                                    <option v-for="(tank, i) in tanks"
                                    :key="i"
                                    :value="tank.id"
                                    >{{ tank.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brew_amount">Amount</label>
                                <input type="number" id="move_amount" v-model="move_tanks.amount" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" @click="move">Save changes</button>
                </div>

                </div>
            </div>
        </div>

        <div class="modal" id="dump_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Dump</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10" :class="error ? 'show' : 'hide'">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> Amount is bigger than amount of the source tank.
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="brew_target_tank">Tank</label>
                                <select name="brew_target_tank" id="dump" v-model="dump_tanks.tank_id" class="form-control">
                                    <option value="">Choose Source Tank...</option>
                                    <option v-for="(tank, i) in tanks"
                                    :key="i"
                                    :value="tank.id"
                                    >{{ tank.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brew_amount">Amount</label>
                                <input type="number" id="dump_amount" v-model="dump_tanks.amount" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" @click="dump">Save changes</button>
                </div>

                </div>
            </div>
        </div>

        <div class="modal" id="keg_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Keg</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10" :class="error ? 'show' : 'hide'">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Danger!</strong> Amount is bigger than amount of the source tank.
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="brew_target_tank">Tank</label>
                                <select name="brew_target_tank" id="keg_tank" v-model="keg_tanks.tank_id" class="form-control">
                                    <option value="">Choose Source Tank...</option>
                                    <option v-for="(tank, i) in tanks"
                                    :key="i"
                                    :value="tank.id"
                                    >{{ tank.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brew_amount">Amount</label>
                                <input type="number" id="keg_tank_amount" v-model="keg_tanks.amount" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" @click="keg">Save changes</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TankComponent from './TankComponent.vue'

export default {
    name: 'Main',
    components: {
        TankComponent,
    },
    mounted() {
        
    },
    created() {
        let base_url = document.getElementById('base_url').value
        let uri = base_url+'api/all'
        this.axios.get(uri).then(response => {
            this.tanks = response.data
        })
    },
    data() {
        return {
            tanks: [],
            brew_tanks: {},
            move_tanks: {},
            dump_tanks: {},
            keg_tanks: {},
            error: false
        }
    },
    methods: {
        brew() {
            let base_url = document.getElementById('base_url').value
            let uri = base_url+'api/brew'
            this.axios.post(uri, this.brew_tanks).then((response) => {
                this.tanks = response.data
                $('#brew_modal').modal('hide')
                this.brew_tanks.tank_id = null
                this.brew_tanks.amount = null
            })
        },
        move() {
            this.error = false;
            let base_url = document.getElementById('base_url').value
            let uri = base_url+'api/move'
            this.axios.post(uri, this.move_tanks).then((response) => {
                if(response.data == 'error') {
                    this.error = true;
                }
                else {
                    this.tanks = response.data
                    $('#move_modal').modal('hide')
                    this.move_tanks.source_tank_id = null
                    this.move_tanks.target_tank_id = null
                    this.move_tanks.amount = null
                }
            })
        },
        dump() {
            this.error = false;
            let base_url = document.getElementById('base_url').value
            let uri = base_url+'api/dump'
            this.axios.post(uri, this.dump_tanks).then((response) => {
                if(response.data == 'error') {
                    this.error = true;
                }
                else {
                    this.tanks = response.data
                    $('#dump_modal').modal('hide')
                    this.dump_tanks.tank_id = null
                    this.dump_tanks.amount = null
                }
            })
        },
        keg() {
            this.error = false;
            let base_url = document.getElementById('base_url').value
            let uri = base_url+'api/keg'
            this.axios.post(uri, this.keg_tanks).then((response) => {
                if(response.data == 'error') {
                    this.error = true;
                }
                else {
                    this.tanks = response.data
                    $('#keg_modal').modal('hide');
                    this.keg_tanks.tank_id = null
                    this.keg_tanks.amount = null
                }
            })
        }
    }
}
</script>

<style>
    .modal-content {
        margin-top: 200px;
    }
</style>
