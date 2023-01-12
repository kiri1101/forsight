<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <AuthLayout>
    <Head title="Register" />

    <section>
      <form @submit.prevent="submit">
        <div class="place-self-center">
          <Link href="/">
            <ApplicationLogo class="w-20 h-20 text-gray-500 fill-current" />
          </Link>
        </div>

        <div class="text-center">
          <p>Hi there! <br />Create your account</p>
        </div>

        <div>
          <InputLabel for="name" value="Name" />

          <TextInput
            id="name"
            type="text"
            class="block w-full mt-1"
            v-model="form.name"
            required
            autofocus
            autocomplete="name"
          />

          <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
          <InputLabel for="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            class="block w-full mt-1"
            v-model="form.email"
            required
            autocomplete="username"
          />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput
            id="password"
            type="password"
            class="block w-full mt-1"
            v-model="form.password"
            required
            autocomplete="new-password"
          />

          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
          <InputLabel for="password_confirmation" value="Confirm Password" />

          <TextInput
            id="password_confirmation"
            type="password"
            class="block w-full mt-1"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />

          <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <div class="flex items-center justify-between mt-4">
          <Link
            :href="route('login')"
            class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >
            Already registered?
          </Link>

          <PrimaryButton
            class="grid"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
      </form>
    </section>
  </AuthLayout>
</template>

<style scoped>
section {
  height: 100%;
  display: grid;
}

section > form {
  display: grid;
  min-width: 70%;
  padding: 2rem;
}

@media screen and (min-width: 768px) {
  section {
    justify-items: end;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
    background-image: url("");
  }

  section > form {
    min-width: 30%;
    background-color: rgb(250, 249, 249);
  }
}

@media screen and (max-width: 768px) {
  section {
    place-items: center;
  }
}

form {
  gap: 0.5rem;
  color: rgb(67, 67, 67);
}
</style>
