<!DOCTYPE html>
<html>
<head>
 <title>Belajar Vue Js</title>
</head>
<body>
 <div id="app">
 @{{ message }}
 </div>
<script src="https://unpkg.com/vue@next"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
 Vue.createApp({
 data() {
 return {
 message: 'Hello World!'
 }
 }
 }).mount('#app')
</script>
</body>
</html>
