<style>
body {
    background-color: #EFEFEF;
}

.container {
    width:100%; 
    margin:50px auto; 
    background: white; 
    padding:10px; 
    font-family: Arial, Helvetica, sans-serif, sans-serif; 
    border-radius: 3px;
}

h1 { 
    font-size: 24px; 
    text-align: center; 
    text-transform: uppercase;
}

.frmField {
    background-color:white; 
    color:#495057; 
    line-height: 1.25; 
    font-size: 16px; 
    font-family: 'Roboto', sans-serif; 
    border:0; 
    padding: 10px; 
    border:1px solid #dbdbdb;  
    border-radius: 3px; 
    width:90%;
}

.frmLabel {
    display: block; 
    margin-bottom: 10px; 
    font-weight: bold;
}

.frmValidation {
    font-size: 13px; 
}

.frmValidation--passed {
    color:#717b85;
}

.frmIcon {
    color:#EB0029;
}
    
.frmValidation--passed .frmIcon {
    color:#0fa140;
}   

.howToBuild { 
    text-align:center; color:purple;
}

.howToBuild a { 
    color:grey; 
    font-weight:bold; 
    text-decoration:none; 
    text-transform:uppercase; 
}
</style>

<template>
    <div id="app" class="container">
        <h1>Vue Password Strength Indicator</h1>
        <label class="frmLabel" for="password">Password</label>
        <input placeholder="Enter your password" name="password" class="frmField" type="password" @input="password_check" v-model="message" /> 
        <p class="frmValidation" :class="{'frmValidation--passed' : message.length > 7 }"><i class="frmIcon fas" :class="message.length > 7 ? 'fa-check' : 'fa-times'"></i> Longer than 7 characters</p>
        <p class="frmValidation" :class="{'frmValidation--passed' : has_uppercase }"><i class="frmIcon fas" :class="has_uppercase ? 'fa-check' : 'fa-times'"></i> Has a capital letter</p>
        <p class="frmValidation" :class="{'frmValidation--passed' : has_lowercase }"><i class="frmIcon fas" :class="has_lowercase ? 'fa-check' : 'fa-times'"></i> Has a lowercase letter</p>
        <p class="frmValidation" :class="{'frmValidation--passed' : has_number }"><i class="frmIcon fas" :class="has_number ? 'fa-check' : 'fa-times'"></i> Has a number</p>
        <p class="frmValidation" :class="{'frmValidation--passed' : has_special }"><i class="frmIcon fas" :class="has_special ? 'fa-check' : 'fa-times'"></i> Has a special character</p>
    </div><!-- #app  -->
</template>

<script>
export default {
    data() {
        return {
            message : '',
            has_number : false,
            has_lowercase : false,
            has_uppercase : false,
            has_special : false,
        }
    },
    methods: {
        password_check: function () {
            this.has_number = /\d/.test(this.message);
            this.has_lowercase = /[a-z]/.test(this.message);
            this.has_uppercase = /[A-Z]/.test(this.message);
            this.has_special = /[!@#\$%\^\&*\)\(+=._-]/.test(this.message);
        }
    },
};       
</script>