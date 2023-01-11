<script setup>
import { Link } from '@inertiajs/inertia-vue3';</script>
<template>
  <nav>
    <Link href="#" class="block block1">
        <p>Block 1</p>
    </Link>
    <section id="right-lane">
      <Link href="#" class="block block2">
          <p>Block 2</p>
      </Link>
      <Link href="#" class="block block3">
          <p>Block 3</p>
      </Link>
      <div class="ca-section">
        <Link href="#" class="block block4">
            <p>Block 4</p>
        </Link>
        <Link href="#" class="block block5">
            <p>Block 5</p>
        </Link>
      </div>
    </section>
  </nav>
</template>

<style scoped>
nav {
  height: 100vh;
  width: 100%;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.75rem;
  grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
}
#right-lane {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}
.block {
  background-color: #2a2d3e;
  padding: 0.75rem;
  border-radius: 0.5rem;
  cursor: pointer;
}
.block2 {
  grid-column: span 3;
}
.block3 {
  grid-column: span 2;
}
.ca-section {
  display: grid;
  gap: 1rem;
  grid-template-rows: repeat(2, 1fr);
}
</style>
