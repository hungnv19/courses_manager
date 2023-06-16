<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <hr class="my-0" />
        <div class="card-body">
          <VeeForm
            as="div"
            v-slot="{ handleSubmit }"
            class="form-owner"
            @invalid-submit="onInvalidSubmit"
          >
            <form
              method="POST"
              @submit="handleSubmit($event, onSubmit)"
              ref="formData"
              enctype="multipart/form-data"
              :action="data.urlUpdate"
            >
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label"
                    >First Name <span class="required-label"> *</span></label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="first_name"
                    placeholder="Enter Your First Name"
                    v-model="model.first_name"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="first_name" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="last_name" class="form-label"
                    >Last Name <span class="required-label"> *</span></label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    name="last_name"
                    id="last_name"
                    placeholder="Enter Your Last Name"
                    v-model="model.last_name"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="first_name" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label"
                    >Email <span class="required-label"> *</span></label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="Enter Your Email Address"
                    placeholder="Enter Your Email Address"
                    v-model="model.email"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="email" />
                </div>

                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phone"
                    >Phone Number <span class="required-label"> *</span></label
                  >
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">VN (+84)</span>
                    <Field
                      type="text"
                      id="phone"
                      name="phone"
                      class="form-control"
                      placeholder="Enter Your Phone Number"
                      v-model="model.phone"
                      rules="required|max:128"
                    />
                    <ErrorMessage class="error" name="phone" />
                  </div>
                </div>
                <div class="mb-3 col-md-4">
                  <label for="address" class="form-label"
                    >Address <span class="required-label"> *</span></label
                  >
                  <Field
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    placeholder="Enter Your Address"
                    v-model="model.address"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="address" />
                </div>
                <div class="mb-3 col-md-4">
                  <label for="date_birth" class="form-label">Date Birth</label>
                  <Field
                    class="form-control"
                    type="date"
                    id="date_birth"
                    name="date_birth"
                    v-model="model.date_birth"
                  />
                </div>
                <div class="mb-3 col-md-4">
                  <label for="position" class="form-label"
                    >Position <span class="required-label"> *</span></label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    id="position"
                    name="position"
                    placeholder="Enter Your Position"
                    v-model="model.position"
                    rules="required|max:128"
                  />
                  <ErrorMessage class="error" name="position" />
                </div>
                <div class="mb-3 col-md-12">
                  <label for="description" class="form-label"
                    >Description <span class="required-label"> *</span></label
                  >
                  <Field
                    class="form-control"
                    type="text"
                    id="description"
                    name="description"
                    placeholder="Enter Your Description"
                    v-model="model.description"
                    rules="required|max:128"
                    cols="30"
                    rows="4"
                    as="textarea"
                  />
                  <ErrorMessage class="error" name="description" />
                </div>
                <div class="row mb-3">
                  <label class="form-label" for="image">Image</label>
                  <div>
                    <div
                      class="display-image"
                      id="img-preview"
                      @click="chooseImage()"
                      role="button"
                      @dragover.prevent
                      @drop="(e) => onDrop(e)"
                    >
                      <div class="align-center-text" v-if="!filePreview">
                        <span v-if="!filePreview"
                          >Đăng ký bằng cách click hoặc kéo thả</span
                        >
                      </div>
                      <div style="display: none">
                        <input
                          :type="typeFile"
                          @change="onChange"
                          ref="fileInput"
                          accept="image/*"
                          name="image"
                          id="image"
                        />
                      </div>
                      <div class="d-flex justify-content-center">
                        <img
                          v-if="filePreview"
                          :src="filePreview"
                          class="img"
                          style="width: 300px"
                        />
                        <span
                          @click="deleteImage"
                          class="icon_delete"
                          v-if="filePreview"
                          ><i class="fa fa-trash"></i
                        ></span>
                      </div>
                      <div class="text-center mt-3">
                        <button
                          class="rounded"
                          @click="chooseImage()"
                          type="button"
                          style="display: none"
                        >
                          アップロード
                        </button>
                      </div>
                    </div>
                  </div>
                  <span class="error" v-if="hasErrImg == true">{{
                    errMsgImage
                  }}</span>
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">
                  Save changes
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  Cancel
                </button>
              </div>
            </form>
          </VeeForm>
        </div>
        <!-- /Account -->
      </div>
    </div>
  </div>
</template>

<script>
import {
  Form as VeeForm,
  Field,
  ErrorMessage,
  defineRule,
  configure,
} from "vee-validate";
import { localize } from "@vee-validate/i18n";
import * as rules from "@vee-validate/rules";
import $ from "jquery";

export default {
  setup() {
    Object.keys(rules).forEach((rule) => {
      if (rule != "default") {
        defineRule(rule, rules[rule]);
      }
    });
  },
  components: {
    VeeForm,
    Field,
    ErrorMessage,
  },
  computed: {},
  props: ["data"],
  data: function () {
    return {
      csrfToken: Laravel.csrfToken,
      filePreview: "",
      typeFile: "file",
      errMsgImage: "",
      hasErrImg: false,
      model: this.data.user,
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          first_name: {
            required: "The first_name field is required.",
            max: "The first_name may not be greater than 128.",
          },
          last_name: {
            required: "The last_name field is required.",
            max: "The last_name may not be greater than 128.",
          },
          first_name: {
            required: "The first_name field is required.",
            max: "The first_name may not be greater than 128.",
          },
          email: {
            required: "The EMAIL field is required.",
            max: "The EMAIL may not be greater than 128.",
          },
          description: {
            required: "The description field is required.",
            max: "The description may not be greater than 255.",
          },
        },
      },
    };
    configure({
      generateMessage: localize(messError),
    });
  },
  methods: {
    deleteImage() {
      this.typeFile = "hidden";
      this.filePreview = "";
      this.media = null;
      this.ImageNotUser = 1;
      this.hasErrImg = false;
    },
    chooseImage() {
      if (this.typeFile == "hidden") {
        this.typeFile = "file";
      }
      this.$refs["fileInput"].click();
    },
    onChange(e) {
      let Image = e.target.files[0];
      if (
        Image.type.includes("image/jpeg") ||
        Image.type.includes("image/png") ||
        Image.type.includes("image/jpg")
      ) {
        this.errMsgImage = "";
        this.hasErrImg = false;
      } else {
        this.errMsgImage = "Định dạng hình ảnh không chính xác.";
        this.hasErrImg = true;
        return;
      }
      if (Image.size >= 20971520) {
        this.errMsgImage = "Ảnh quá lớn.";
        this.hasErrImg = true;
      } else {
        this.hasErrImg = false;
      }

      this.model.image = e.target.files[0];
      let fileInput = this.$refs.fileInput;
      let imgFile = fileInput.files;

      if (imgFile && imgFile[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.filePreview = e.target.result;
        };
        reader.readAsDataURL(imgFile[0]);
      }
    },
    onInvalidSubmit({ values, errors, results }) {
      let firstInputError = Object.entries(errors)[0][0];
      this.$el.querySelector("input[name=" + firstInputError + "]").focus();
      $("html, body").animate(
        {
          scrollTop:
            $("input[name=" + firstInputError + "]").offset().top - 150,
        },
        500
      );
    },
    onSubmit() {
      this.$refs.formData.submit();
    },
  },
};
</script>

