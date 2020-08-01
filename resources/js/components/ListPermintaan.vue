<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Daftar Permintaan
            </div>
            <div class="card-body">
                <router-link :to="{name:'create'}" class="btn btn-outline-primary my-2">Buat Permintaan</router-link>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Total Barang</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(permintaan, index) in daftarPermintaan" :key="permintaan.id">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ permintaan.karyawan.nama }}</td>
                            <td>{{ permintaan.total_qty }}</td>
                            <td>{{ permintaan.tanggal }}</td>
                            <td>
                                <router-link :to="{name: 'show', params: { id: permintaan.id }}" class="btn btn-sm btn-outline-info">Detail</router-link>
                                <button class="btn btn-sm btn-outline-danger" @click="remove(index, permintaan.id)">Delete</button>
                            </td>
                        </tr>
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
                daftarPermintaan : []
            }
        },
        created() {
            let uri = 'api/list-permintaan';
            this.axios.get(uri).then(response => {
                this.daftarPermintaan = response.data;
            });
        },
        methods : {
            remove:function(index, id){
                this.$swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                    }).then((result) => {
                    if (result.value) {
                        this.$swal.fire({
                            title: 'Success!',
                            text: 'Article deleted successfully',
                            icon: 'success',
                            timer: 1000
                        });
                        let uri = `/api/permintaan/${id}`;
                        this.daftarPermintaan.splice(index,1);
                        this.axios.delete(uri).then(response => {
                            console.log(response.data);
                        });
                    }
                })

            }
        }
    }
</script>
