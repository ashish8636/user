<template>
    <div class="">
        <div>
            <h3 class="text-center" v-if="showuser"> All User Details </h3>
            <table class="table" v-if="showuser">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Id</th>
                        <th>UserId</th>
                        <th>Body</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tr v-for="(item,index) in list" :key="item.id">
                    <td>{{ index+1 }}</td>
                    <td>{{ item.id }}</td>
                    <td>{{ item.userId }}</td>
                    <td>{{ item.body }}</td>
                    <td> {{item.title}}</td>
                    <td><button class="btn btn-primary btn-sm" @click="editfeature(item.id)">User Details</button></td>
                </tr>
            </table>
        </div>
        <div  v-if="userdetails">  
            <div >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h3> User Details </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-primary btn-sm" @click="back()">Back</button>
                        </div>
                    </div>
                </div>
                <table class="table" >
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>UserName</th>
                            <th>Website</th>
                            <th>Address</th>
                            <th>Company</th>
                        </tr>
                    </thead>
                    <tr >
                        <td>{{ usersdetails.id }}</td>
                        <td>{{ usersdetails.name }}</td>
                        <td>{{ usersdetails.phone }}</td>
                        <td> {{usersdetails.username}}</td>
                        <td>{{usersdetails.website}}</td>
                        <td><div v-if="usersdetails.address !=null" ><b> City :- </b>{{usersdetails.address.city}}<br>
                        <b> Street:- </b> {{usersdetails.address.street}} <br>
                        <b> Suite:- </b> {{usersdetails.address.suite}} <br>
                        <b> Zipcode:- </b>{{usersdetails.address.zipcode}} <br>
                        </div></td>
                        <td><div v-if="usersdetails.company !=null" ><b> BS :- </b>{{usersdetails.company.bs}}<br>
                        <b> CatchPhrase:- </b> {{usersdetails.company.catchPhrase}} <br>
                        <b> Name:- </b> {{usersdetails.company.name}} <br>
                        
                        </div></td>
                    </tr>
                </table>

            </div>
            <div>
                <h3> Comment Section </h3>
                <table class="table" >
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>Id</th>
                            <th>UserId</th>
                            <th>Name</th>
                            <th>Body</th>
                            <th>E-Mail</th>
                        </tr>
                    </thead>
                    <tr v-for="(item) in userscomment" :key="item.id">
                        
                        <td>{{ item.id }}</td>
                        <td>{{ item.postId }}</td>
                        <td>{{ item.name }}</td>
                        <td> {{item.body}}</td>
                        <td>{{item.email}}</td>
                    </tr>
                </table>
            </div>
         
        </div>        
    </div>
</template>

<script>
    export default {
        data(){
            return {
                list:[],
                showuser: true,
                userdetails: false,
                usersdetails:[],
                userscomment:[]
            }
	    },
        mounted() {
            axios.get(' https://jsonplaceholder.typicode.com/posts')
            .then(response=>this.processProducts(response.data))
        },
        methods:{
        back(){
            this.showuser = true;
        },
		processProducts(data){
			this.list = data;
        },
        editfeature(item){
            axios.get('https://jsonplaceholder.typicode.com/users/'+item  )
            .then(response=>this.processresponse(response.data))

             axios.get(' https://jsonplaceholder.typicode.com/comments?postId='+item  )
            .then(response=>this.processresponsecomment(response.data))

        },
        processresponse(data){
            this.showuser = false;
            this.userdetails = true;
            this.usersdetails = data;
            console.log("users", this.usersdetails)
        },
        processresponsecomment(data){
            this.userscomment = data;
        }
        }
    }
</script>
