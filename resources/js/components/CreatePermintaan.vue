<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Tambah Permintaan Baru
            </div>
            <div class="card-body">

                <form @submit.prevent="store">
                <div class="row my-4 mx-2">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nik">Nik</label>
                            <select v-model="karyawan" class="form-control" required>
                                <option v-for="karyawan in list_karyawan" :key="karyawan.nik" :value="karyawan">{{ karyawan.nik }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama">Nama</label>
                            <input v-model="nama" type="text" class="form-control" id="nama" placeholder="Nama Peminta" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="departemen">Departemen</label>
                            <input v-model="departemen" type="text" class="form-control" id="departemen" placeholder="Departemen" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tanggal">Tanggal</label>
                            <input v-model="tanggal" type="date" class="form-control" id="tanggal" required>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Barang</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tersedia</th>
                            <th scope="col">Kuantiti</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(input, i) in inputs" :key="i">
                            <td>
                                <select v-on:change="changeItem(i, $event)" class="form-control" required>
                                    <option value="" readonly>Pilih Barang</option>
                                    <option v-for="barang in list_barang" :key="barang.kode" :value="barang.kode">{{ barang.kode }} - {{ barang.nama }}</option>
                                </select>
                            </td>
                            <td><input width="20%" type="text" class="form-control" v-model="input.kode_lokasi" readonly></td>
                            <td><input type="text" class="form-control" v-model="input.stok" readonly></td>
                            <td><input type="number" class="form-control" v-model="input.sub_qty" required></td>
                            <td><input type="text" class="form-control" v-model="input.satuan" readonly></td>
                            <td><input type="text" class="form-control" v-model="input.keterangan" required></td>
                            <td v-if="input.status"><span class="badge badge-success">Terpenuhi</span></td>
                            <td v-else>-</td>
                            <td><button @click="remove(i)" class="btn btn-sm btn-outline-danger">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <button @click="add()" class="btn btn-success">+ Tambah</button>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary mx-2">Simpan</button>
                    <router-link :to="{name:'home'}" class="btn btn-outline-secondary mx-2">Kembali</router-link>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                list_karyawan : [],
                karyawan : null,
                nik : null,
                nama : null,
                departemen : null,
                tanggal : null,
                list_barang : [],
                kd_barang : [],
                inputs : [
                    { kode : '', nama : '', sub_qty : '', kode_lokasi : '', stok : '', status : '', satuan : '', kode_lokasi : '', keterangan : ''}
                ],

            }
        },
        created() {
            let uri = '/api/list-karyawan';
            this.axios.get(uri).then(response => {
                this.list_karyawan = response.data;
            });
            let uri_brg = '/api/brg-terpenuhi';
            this.axios.get(uri_brg).then(response => {
                this.list_barang = response.data;
            });
        },
        methods: {
            add:function(){
                this.inputs.push({ kode : '', nama : '', sub_qty : '', kode_lokasi : '', stok : '', status : '', satuan : '', kode_lokasi : '', keterangan : ''});
            },
            remove:function(index){
                this.inputs.splice(index,1);
            },
            changeItem : async function(i, event){
                let kode = event.target.value;
                let barang = await this.axios.get('/api/barang/'+kode).then(response => {
                    return response.data[0];
                })
                this.$set(this.inputs, i, barang)
                // console.log(this.inputs);
            },
            store : function(){
                let uri_store = '/api/store';
                let data = {
                    'permintaan' : { nik : this.nik, nama : this.nama, total_qty : this.total_qty, departemen : this.departemen,  tanggal : this.tanggal },
                    'detail' : this.inputs

                }
                // console.log(data);
                this.axios.post(uri_store, data).then(response => {
                    // console.log(response.data);
                    this.$router.push({name : 'home'});
                });
            }
        },
        watch:{
            karyawan : function(val){
                this.nik = val.nik;
                this.nama = val.nama;
                this.departemen = val.departemen;
            }
        },
        computed : {
            total_qty : function(){
                let total = 0;
                for(let t of this.inputs){
                    total += parseInt(t.sub_qty);
                }
                return total;
            }
        }

    }
</script>
