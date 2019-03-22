<template>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="btn btn-danger">List User</h1>
                    <h1 class="btn btn-warning"><router-link :to="{name:'CreateRegister'}">Add User</router-link></h1>
                    <h1 class="btn btn-info"><router-link :to="{name:'LoginUser'}">Login User</router-link></h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users">
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.password}}</td>
                                    <td>{{user.created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
         
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                users:[]
            }
        },
        created:function(){
            this.listUser();
        },
        methods:{
            listUser(){
                this.axios.get("https://localhost:8080/dangky").then((response)=>{
                    this.users=response.data;
                });
            }
        }
    }
</script>
