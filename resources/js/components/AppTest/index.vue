<template>
    <div>
        <el-row>
            <el-col :span="24">
                <h1 class="lorem-ipsum lorem-heading">Lorem ipsum dolor sit amet</h1>
            </el-col>

        </el-row>
        <el-row>
            <el-col class="lorem-ipsum" :span="12">
                <p class="lorem-paragraph-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </el-col>
            <el-col class="lorem-ipsum" :span="12">
                <p class="lorem-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    name: "AppTest"
}
</script>

<style scoped>
.lorem-ipsum {
    padding: 15px;
}
.lorem-heading {
    color: red;
    font-size: 24px;
}
.lorem-paragraph-1 {
    color: green;
    font-style: italic;
}
.lorem-paragraph-2 {
    color: blue;
    font-weight: 700;
}
</style>
