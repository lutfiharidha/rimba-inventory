<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <div class="dropdown mr-3">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Item
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <router-link to="/item" class="nav-item nav-link"
                >Item List</router-link
              >
              <router-link to="/create/item" class="nav-item nav-link"
                >Create Item</router-link
              >
            </div>
          </div>

          <div class="dropdown mr-3">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Customer
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <router-link to="/customer" class="nav-item nav-link"
                >Customer List</router-link
              >
              <router-link to="/create/customer" class="nav-item nav-link"
                >Create Customer</router-link
              >
            </div>
          </div>
          <div class="dropdown">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Sale
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <router-link to="/sale" class="nav-item nav-link"
                >Sale List</router-link
              >
              <router-link to="/create/sale" class="nav-item nav-link"
                >Create Sale</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </nav>

    <router-view> </router-view>
  </div>
</template>

<script>
export default {};
</script>
