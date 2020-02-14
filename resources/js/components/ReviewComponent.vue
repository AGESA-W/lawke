<template>
    <div>
        <form @submit.prevent= "postReview">
           
            <div class="form-group">
                <label for=""><span class="asterick"><b>*</b></span><b> Select a rating for your lawyer</b></label>
                <star-rating :star-size="25" :border-width="3" v-model= "formData.rating" required></star-rating> 
            </div>

            <div class="form-group">
                <label for=""><span class="asterick"><b>*</b></span><b>Add a title</b> </label>
                <input type="text" class="form-control" v-model= "formData.headline" required>
            </div>

            <div class="form-group">
                <label for=""><span class="asterick"><b>*</b></span> <b>Write your review</b> </label>
                <textarea v-model= "formData.description" class="form-control" placeholder="Be specific. Explain what your lawyer did (or failed to do) with your case. Your review should clearly indicate that you contacted, consulted with, or hired the attorney." maxlength="4000" id="description" cols="30" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="gender" class="col-form-label"> <span class="asterick"><b>*</b></span> <b>Was this just a consultation or did you hire this attorney?</b> </label>
                <div class="form-check d-flex">
                    <input class="form-check-input" type="radio"  v-model= "formData.consultation" id="consulted" value="consulted"  required >
                    <label for="consulted">Consulted</label>

                    <div class="option2 pl-5">
                        <input class="form-check-input " type="radio" v-model= "formData.consultation" id="hired" value="hired" required>
                        <label  for="hired">Hired</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="recommend" class="col-form-label"> <span class="asterick"><b>*</b></span> <b> Would you recommend this lawyer?</b></label>
                <div class="form-check d-flex">
                    <input class="form-check-input" type="radio"  v-model= "formData.recommend" id="yes" value="yes"  required >
                    <label class="form-check-label" for="yes">Yes</label>

                    <div class="option2 pl-5">
                        <input class="form-check-input " type="radio" v-model= "formData.recommend" id="no" value="no" required>
                        <label  for="no">No</label>
                    </div>
                </div>
            </div>
                <p><b>Note:Your review will be shared publicly.Stick to review guidelines.</b></p>
            <button type="submit" class="btn bg-color review-btn">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        props:['attorney','url'],
        data(){
            return{
                formData:{}
            }
        },
        methods:{
            postReview(){
                this.formData.attorney_id = this.attorney.id;

                
                axios.post(this.url,this.formData)
                .then(data=>{
                    window.location.assign("/profile/"+this.attorney.id);
                    // location.reload();
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        },
    }
</script>
