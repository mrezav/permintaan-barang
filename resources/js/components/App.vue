<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-2">
                <div id="list-menu" class="list-group">
                    <router-link :to="{name : 'home'}" :class="activeClass=='/'? 'active' : ''" class="list-group-item list-group-item-action">Home</router-link>
                    <router-link :to="{name : 'barang'}" :class="activeClass=='/barang'? 'active' : ''" class="list-group-item list-group-item-action">Barang</router-link>
                    <router-link :to="{name : 'karyawan'}" :class="activeClass=='/karyawan'? 'active' : ''" class="list-group-item list-group-item-action">Karyawan</router-link>
                </div>
            </div>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    computed: {
        activeClass : function(){
            return this.$route.path;
        }
    }
}
</script>
