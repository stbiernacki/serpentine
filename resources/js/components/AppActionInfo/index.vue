<template>
    <div>
        <p class="app-action-info-heading">Hello!</p>
        <hr>
        <p class="app-action-info-paragraph">This action is not available.</p>
        <p class="app-action-info-paragraph">This is a trial version.</p>
    </div>
</template>

<script>
export default {
    name: "AppActionInfo"
}
</script>

<style scoped>
.app-action-info-heading {
    color: green;
    font-size: 1.1em;
}
.app-action-info-paragraph {
    color: darkblue;
    font-weight: 400;
}
</style>
