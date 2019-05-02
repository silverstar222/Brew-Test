<template>
    <div class="tank-container">
        <div class="beer-amount">
            <span>{{ amount }}</span>
        </div>
        <div class="tank-name">
            <span>{{ tank_name }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TankComponent.vue',
    data() {
        return {

        }
    },
    props: {
        amount: {
            type: Number,
            default () {
                return 0
            }
        },
        tank_name: {
            type: String,
            default () {
                return ""
            }
        }
    }
}
</script>
<style>
    .tank-container {
        width: 17.1%;
        height: 270px;        
        background: url('/images/tank.png') no-repeat;
        background-size: cover;
        display: inline-block;
        margin: 15px;
        color: #fff;
        font-weight: bold;
        text-align: center;
        position: relative;
        font-size: 1.2rem;
    }
    .beer-amount {
        width: 100%;
        color: black;
        text-align: center;
        position: absolute;
        top: 10px;
    }
    .tank-name {
        position: absolute;
        bottom: 90px;
        width: 100%;
        text-align: center;
    }
</style>