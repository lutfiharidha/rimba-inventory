<template>
  <div>
    <h2 class="text-center">Products List</h2>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Stok</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in items" :key="product.id">
          <td>{{ product.id }}</td>
          <td>{{ product.nama_item }}</td>
          <td>{{ product.stok }}</td>
          <td>
            <div class="btn-group" role="group">
              <router-link
                :to="{ name: 'edit', params: { id: product.id } }"
                class="btn btn-success"
                >Edit</router-link
              >
              <button class="btn btn-danger" @click="deleteProduct(product.id)">
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/items/").then((response) => {
      this.items = response.data;
    });
  },
  methods: {
    deleteProduct(id) {
      this.axios
        .delete(`http://localhost:8000/api/products/${id}`)
        .then((response) => {
          let i = this.items.map((data) => data.id).indexOf(id);
          this.items.splice(i, 1);
        });
    },
  },
};
</script>
