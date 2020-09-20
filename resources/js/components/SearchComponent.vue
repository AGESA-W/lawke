<template>
    <div>
         
        <form @submit.prevent= "postSearch" class="form-inline justify-content-center md-form form-sm mt-0">
           
            <input class="form-control my-0 py-1 w-75" type="text" placeholder="Search by name or county" v-model= "search">

            <div class="input-group-append">
                    <button  type="submit" class="input-group-text red lighten-3" id="basic-text1"><i class=" py-1 fa fa-search text-grey"
                        aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                search:''
            }
        },
        methods:{
            postSearch(){
                axios.post('api/filter')
                .then(()=>{

                    location.reload();
                })
               
            }
        },
    }
</script>
