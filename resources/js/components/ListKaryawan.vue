<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Daftar Karyawan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Departemen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, index) in employees" :key="employee.nik">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ employee.nik }}</td>
                            <td>{{ employee.nama }}</td>
                            <td>{{ employee.departemen }}</td>
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
                employees : []
            }
        },
        created() {
            let uri = '/api/list-karyawan';
            this.axios.get(uri).then(response => {
                this.employees = response.data;
            });
        },
        method: {

        }
    }
</script>

