<template>

  <div class="col-xs-12 col-sm-10 col-md-4">

    <div class="card">

      <div class="card-header">
        <h2 class="card-title">
          <a :href="'/productos/'+product.id">{{ product.title }}</a>
        </h2>
        <p class="card-subtitle text-muted">{{ product.humanPrice }}</p>
      </div>

      <div class="card-body">
        <div class="card-text">{{ product.description }}</div>
      </div>

    </div>
    
  </div>

</template>

<script>
export default {
    props : {
        product : {
            type : Object
        }
    }
};
</script>