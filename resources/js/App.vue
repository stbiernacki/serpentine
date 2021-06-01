<template>
  <div class="container mx-auto">
      <el-divider class="serpentine-divider" content-position="right">Simple Page Navigation</el-divider>
      <el-row>
          <el-col :span="12">
              <router-link class="serpentine-link" to="/dashboard">Star Wars Page - List</router-link>
          </el-col>
          <el-col :span="12">
              <router-link class="serpentine-link" to="/dashboard/example">Example Page - Transition</router-link>
          </el-col>
      </el-row>
      <el-divider class="serpentine-divider" content-position="right">Page</el-divider>
      <transition name="fade-transform" mode="out-in">
          <router-view />
      </transition>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style scoped>
.serpentine-link:hover {
    color: blue;
}
.serpentine-link {
    color: green;
}
.serpentine-divider {
    font-style: italic;
    border: green solid 1px;
}
/* fade-transform */
.fade-transform-leave-active,
.fade-transform-enter-active {
    transition: all .5s;
}

.fade-transform-enter {
    opacity: 0;
    transform: translateX(-30px);
}

.fade-transform-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>
