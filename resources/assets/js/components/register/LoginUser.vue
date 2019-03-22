<template>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="btn btn-danger">Login User</h1>
                    <form action="" method="post" v-on:submit.prevent="onSubmit">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" name="email" v-model="user.email" class="form-control" placeholder="Enter email"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="pass" v-model="user.pass" class="form-control" placeholder="Enter password"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button class="btn btn-warning">Login</button>
                                        <label class="label label-success" v-if="check_a">Login thanh cong</label><br/>
                                        <label class="label label-success" v-if="check_b">Login Khong thanh cong</label><br/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
         
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                user:{},
                check_a:false,
                check_b:false
            }
        },
        methods:{
            onSubmit(){
                this.axios.post("https://localhost:8080/dangky/loginUser",this.user).then((response)=>{
                    var data = response.data.success;
                    if(data>0){
                        this.check_a=true;
                        this.check_b=false;
                    }
                    else{
                        this.check_a=false;
                        this.check_b=true;
                    }
 
                });
            }
        }
    }
</script>
