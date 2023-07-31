<template>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div
          class="card-header d-flex align-items-center justify-content-between"
        >
          <h5 class="mb-0">Create Course</h5>
        </div>
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
              <Field type="hidden" value="PUT" name="_method" />
              <Field type="hidden" :value="csrfToken" name="_token" />
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Title <span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    type="text"
                    class="form-control"
                    id="basic-default-name"
                    placeholder="Title"
                    v-model="model.title"
                    rules="required|max:128"
                    name="title"
                  />
                  <ErrorMessage class="error" name="title" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Category"
                  >Category<span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <select
                    id="Category"
                    class="form-control"
                    rules="required"
                    name="category_id"
                    v-model="model.category_id"
                  >
                    <option value disabled selected>
                      --- Chose Category ---
                    </option>
                    <option
                      v-for="category in data.categories"
                      :key="category.id"
                      :value="category.id"
                    >
                      {{ category.label }}
                    </option>
                  </select>
                  <ErrorMessage class="error" name="category_id" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Language"
                  >Language<span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <select
                    id="Language"
                    name="language_id"
                    class="form-control"
                    rules="required"
                    v-model="model.language_id"
                  >
                    <option value disabled selected>
                      --- Chose Language ---
                    </option>
                    <option
                      v-for="language in data.languages"
                      :key="language.id"
                      :value="language.id"
                    >
                      {{ language.label }}
                    </option>
                  </select>
                  <ErrorMessage class="error" name="language_id" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Level"
                  >Level<span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <select
                    id="Level"
                    name="level_id"
                    class="form-control"
                    rules="required"
                    v-model="model.level_id"
                  >
                    <option value disabled selected>--- Chose Level ---</option>
                    <option
                      v-for="level in data.levels"
                      :key="level.id"
                      :value="level.id"
                    >
                      {{ level.label }}
                    </option>
                  </select>
                  <ErrorMessage class="error" name="level_id" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="Description"
                  >Description<span class="required-label"> *</span></label
                >
                <div class="col-sm-10">
                  <Field
                    id="Description"
                    type="text"
                    name="description"
                    autocomplete="off"
                    v-model="model.description"
                    as="textarea"
                    rules="required|max:255"
                    class="form-control"
                    placeholder="Enter Description"
                    cols="30"
                    rows="4"
                  />
                  <ErrorMessage class="error" name="description" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >Start Date <span class="required-label"> *</span></label
                >
                <div class="col-sm-4">
                  <datepicker
                    autoApply
                    keepActionRow
                    v-model="model.start_date"
                    :closeOnAutoApply="false"
                    :enableSeconds="true"
                    :monthChangeOnScroll="false"
                    class="col-sm-6"
                    name="start_date"
                    :maxDate="model.end_date ? new Date(model.end_date) : null"
                    :maxTime="setMaxTime()"
                    timerPicker="false"
                    format="yyyy/MM/dd HH:mm:ss"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name"
                  >End Date <span class="required-label"> *</span></label
                >
                <div class="col-sm-4">
                  <datepicker
                    autoApply
                    keepActionRow
                    v-model="model.end_date"
                    :closeOnAutoApply="false"
                    :monthChangeOnScroll="false"
                    class="col-sm-6"
                    name="end_date"
                    :minTime="setMinTime()"
                    :minDate="
                      model.start_date ? new Date(model.start_date) : null
                    "
                    timerPicker="false"
                    format="yyyy/MM/dd HH:mm:ss"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="image">Image</label>
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
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a
                    :href="data.urlBack"
                    class="btn btn-outline-secondary"
                    style="margin-left: 10px"
                  >
                    Back
                  </a>
                </div>
              </div>
            </form>
          </VeeForm>
        </div>
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
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
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
    Datepicker,
  },
  computed: {},
  props: ["data"],
  data: function () {
    return {
      csrfToken: Laravel.csrfToken,

      model: this.data.course,
      filePreview: "",
      typeFile: "file",
      errMsgImage: "",
      hasErrImg: false,
      languages: [],
      categories: [],
      levels: [],
    };
  },
  created() {
    let messError = {
      en: {
        fields: {
          title: {
            required: "The name field is required.",
            max: "The name may not be greater than 128.",
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
    setMaxTime() {
      if (this.model.end_date && this.model.start_date) {
        let dateStart = new Date(this.model.start_date);
        let dateEnd = new Date(this.model.end_date);
        if (
          dateStart.getFullYear() == dateEnd.getFullYear() &&
          dateStart.getMonth() == dateEnd.getMonth() &&
          dateStart.getDate() == dateEnd.getDate()
        ) {
          return {
            hours: dateEnd.getHours(),
            minutes: dateEnd.getMinutes(),
            seconds: dateStart.getSeconds(),
          };
        }
      }
      return null;
    },
    setMinTime() {
      if (this.model.end_date && this.model.start_date) {
        let dateStart = new Date(this.model.start_date);
        let dateEnd = new Date(this.model.end_date);
        if (
          dateStart.getFullYear() == dateEnd.getFullYear() &&
          dateStart.getMonth() == dateEnd.getMonth() &&
          dateStart.getDate() == dateEnd.getDate()
        ) {
          return {
            hours: dateStart.getHours(),
            minutes: dateStart.getMinutes(),
            seconds: dateStart.getSeconds(),
          };
        }
      }
      return null;
    },
  },
};
</script>

