<script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  email: String,
  token: String,
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("password.store"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <AuthLayout>
    <Head title="Reset Password" />

    <section>
      <form @submit.prevent="submit">
        <div class="place-self-center">
          <Link href="/">
            <ApplicationLogo class="w-20 h-20 text-gray-500 fill-current" />
          </Link>
        </div>

        <div class="text-center">
          <p>Hi there! <br />Want to reset your password?</p>
        </div>

        <div>
          <InputLabel for="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="mt-4">
          <InputLabel for="password" value="Password" />

          <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full"
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
            class="mt-1 block w-full"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />

          <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

        <div class="flex items-center justify-end mt-4">
          <PrimaryButton
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Reset Password
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
