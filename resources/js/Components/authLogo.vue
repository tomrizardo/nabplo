<template>
   <div class="logo">
     <img :src="$page.props.base_url + 'img/logo/nabplologo.png'"  alt="nabplo" /> <span class="tracking-wider text-blues">NABPLO</span>
   </div>
</template>
<style>

.logo {
  text-decoration: underline;
    max-width: 100%;
    display: flex;
    align-items: center;
    font-size: 1.3em;
    font-weight: 600;
    color:rgb(5 119 226);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}
.logo img {
    margin-right: 0.5em;
    height: 4vh;
}
</style>