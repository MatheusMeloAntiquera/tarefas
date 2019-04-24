<template>
  <div class="flex-center position-ref full-height" id="app">
    <div class="content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
#app {
  margin-top: 25px;
}
</style>

