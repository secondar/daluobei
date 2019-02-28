$(function(){
  /*
   * For the sake keeping the code clean and the examples simple this file
   * contains only the plugin configuration & callbacks.
   * 
   * UI functions ui_* can be located in: demo-ui.js
   */
  $('#drag-and-drop-zone').dmUploader({ //
    url: './adminu/upload.php',
    //maxFileSize: 3000000, // 3 Megs 
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
    },
    onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
    },
    onInit: function(){
      // Plugin is ready to use
      ui_add_log('初始化完成:)', 'info');
    },
    onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('所有挂起的传输都已完成！');
    },
    onNewFile: function(id, file){
      // When a new file is added using the file selector or the DnD area
      ui_add_log('新增文件 id # ' + id);
      ui_multi_add_file(id, file);
    },
    onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('开始上传 id # ' + id);
      ui_multi_update_file_status(id, 'uploading', '上传中...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Happens when a file is directly canceled by the user.
      ui_multi_update_file_status(id, 'warning', '被用户取消');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // A file was successfully uploaded
      ui_add_log('文件的服务器响应 id # ' + id + ': ' + JSON.stringify(data));
      ui_add_log('文件上传 #' + id + ' 完成', '成功');
      if(data.status=='ok'){
        ui_multi_update_file_status(id, 'success', '上传完成<br>直链:'+data.data.url);
      }else{
        ui_multi_update_file_status(id, 'warning', '上传失败<br><spawn style="color: #000000">错误信息:</spawn>'+data.msg);
      }
      
      ui_multi_update_file_progress(id, 100, 'success', false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // When the browser doesn't support this plugin :(
      ui_add_log('无法在此处使用插件，正在运行回退回调', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' 无法添加：大小超出限制', 'danger');
    }
  });
});