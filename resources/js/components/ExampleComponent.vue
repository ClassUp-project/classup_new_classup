<template>


    <div class="container -m-10">

        <div class='row justify-content-center '>
            <div class="col-md-9">
                <div class ="card card-default">
                 <div class="card-header">Dropzone</div>
                 <div class="card-body">
                <div class="uploader" ref="imageUpload"
                   @dragenter="OnDragEnter"
                   @dragleave="OnDragLeave"
                   @dragover.prevent
                   @drop="onDrop"
                   :class="{dragging:isDragging}">

                    <i class="fa fa-cloud-upload"></i>
                    <p>Glissez vos documents ici</p>
                    <div>OU</div>
                    <div class='file-input'>
                        <label for="file">sélectionnez</label>
                        <input type="file" id="file">
                        <input type="hidden" name="utilisateur_idutilisateur">
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Dropzone from 'dropzone';
    export default {
        data: function () {
            return {
                 isDragging:false,
                 dragCount: 0,
                dropzone: null
            }
        },
        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/api/images',

            });
           
        },
         methods: {
                    OnDragEnter(e)
                {
                  e.preventDefault();
                    this.dragCount++;
                    this.isDragging=true;
                 },
                 OnDragLeave(e)
                {
                  e.preventDefault();
                  this.dragCount--;
                  if(this.dragCount<= 0)
                    this.isDragging=false;
                 },
                 onInputChange(e)
                 {
                     console.log(e);
                 },
                    onDrop(e)
                    {
                        console.log(e);
                    }
         },
    }
</script>

<style lang="scss" scoped>
.uploader{
 width: 100%;
background:#2196F3;
color:#fff;
padding: 40px 15px;
text-align: center;
border: 3px dashed #fff;
font-size: 20px;
position: relative;
 &.dragging {
    background: #fff;
    color: #2196F3;
    border: 3px dashed #2196F3;
.file-input label {
    background: #2196F3;
    color: #fff;
        }
    }
 i {
    font-size: 85px;
 }
 .file-input {
    width: 200px;
    margin: auto;
    height: 68px;
    position: relative;
label ,input {
    background: #fff;
    color: #2196F3;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    padding: 10px;
    border-radius: 4px;
    margin-top: 7px;
    cursor: pointer;
}
input{
    opacity:0 ;
    z-index: -2;
}
}
}
.card-header
{
    text-align: center;
    color:rgb(77, 168, 243);
    font-weight: 900;
    font-size:30px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
</style>
