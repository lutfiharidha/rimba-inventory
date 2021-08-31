<template>
  <div>
    <h3 class="text-center">Create Product</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addProduct" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Item</label>
            <input type="text" class="form-control" name="nama_item" />
          </div>
          <div class="form-group">
            <label>Unit</label>
            <select class="form-control" name="unit" id="">
              <option value="">Pilih Unit</option>
              <option value="kg">Kg</option>
              <option value="pcs">Pcs</option>
            </select>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="text" class="form-control" name="stok" />
          </div>
          <div class="form-group">
            <label>Harga Satuan</label>
            <input type="text" class="form-control" name="harga_satuan" />
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" @change="onImageChange" />
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nama_item: "",
      unit: "",
      stok: "",
      harga_satuan: "",
      image: "",
    };
  },
  methods: {
    onImageChange(e) {
      console.log(e.target.files[0]);
      this.image = e.target.files[0];
    },
    addProduct(e) {
      e.preventDefault();
      let currentObj = this;

      const config = {
        headers: { "content-type": "multipart/form-data" },
      };

      let formData = new FormData();
      formData.append("image", this.image);
      formData.append("nama_item", this.nama_item);
      formData.append("unit", this.unit);
      formData.append("stok", this.stok);
      //   const json = JSON.stringify({
      //     nama_item: this.nama_item,
      //     unit: this.unit,
      //     stok: this.stok,
      //     harga_satuan: this.harga_satuan,
      //   });
      //   formData.append("data", json);

      this.axios
        .post("http://localhost:8000/api/items", formData, config)
        .then((response) => console.log(response))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
