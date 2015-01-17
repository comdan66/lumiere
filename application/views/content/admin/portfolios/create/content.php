<section class="grid col-three-quarters mq2-col-full">
  <h2>Portfolio > Create</h2>
  <hr>
  <h4>＊為必填欄位</h4>
  <form action="<?php echo base_url (array ('admin', 'portfolios', 'create'));?>" method="post" enctype="multipart/form-data" >
    <article>
<?php if (isset ($message) && $message) { ?>
        <div class='error'><?php echo $message;?></div>
<?php } ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width='80'>分類＊</td>
            <td class="textleft">
              <select name='portfolio_tag_id'>
                <option value='0'>未分類</option>
          <?php if ($tags = PortfolioTag::all ()) {
                  foreach ($tags as $tag) { ?>
                    <option value='<?php echo $tag->id;?>'><?php echo $tag->name;?></option>
            <?php }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>標題＊</td>
            <td class="textleft">
              <input type='text' name='title' value="" placeholder='請輸入標題' maxlength='100' pattern=".{1,100}" required title="輸入100個字元以內" />
              &nbsp;&nbsp;輸入100個字元以內
            </td>
          </tr>
          <tr>
            <td>區域＊</td>
            <td class="textleft">
              <input type='text' name='address' value="" placeholder='請輸入區域' maxlength='200' pattern=".{1,200}" required title="輸入200個字元以內" />
              &nbsp;&nbsp;輸入200個字元以內
            </td>
          </tr>
          <tr>
            <td>坪數＊</td>
            <td class="textleft">
              <input type='number' name='level' value="" placeholder='輸入坪數(數字)' maxlength='100' pattern="\d*" required title="輸入坪數(數字)" />
              &nbsp;&nbsp;輸入坪數(數字)
            </td>
          </tr>
          <tr>
            <td>圖片＊</td>
            <td class="textleft">
              <div class='files'>
                <button type="button" class='add_pic'>＋</button>
              </div>
              <br />
              ( 圖片格式：jpg / gif / png )
              <br />
              * 最多12張圖
            </td>
          </tr>
          <tr>
            <td>狀態＊</td>
            <td class="textleft">
              <select name='is_enabled'>
                <option value='1'>上架</option>
                <option value='0'>下架</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
      <hr>
        <button type="button" id='add_block1'>加入區塊1</button>
        <button type="button" id='add_block2'>加入區塊2</button>
        <button type="submit">確定新增</button>
    </article>
  </form>
</section>

<script id='_file' type='text/x-html-template'>
  <input type="file" name='files[]' class='file' value='' accept="image/jpg, image/jpeg, image/png" />
</script>

<script id='_block1' type='text/x-html-template'>
  <table data-index='<%=index%>' data-count='0' width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
    <tbody>
      <tr>
        <td bgcolor="#F7F7F7" width="80">標題</td>
        <td bgcolor="#F7F7F7" class="textleft">
          <input type="hidden" name='blocks[<%=index%>][type]' value='1' />
          <input type='text' value="" name='blocks[<%=index%>][title]' placeholder='請輸入標題' title="輸入100個字元以內" >
          <button type="button" class='add_item' data-parent='block_2'>＋ 新增規格</button>
          <div class='delete'>x</div>
        </td>
      </tr>
    </tbody>
  </table>
</script>

<script id='_block1_item' type='text/x-html-template'>
  <tr>
    <td>規格</td>
    <td class="textleft">
      <input type='text' name='blocks[<%=i%>][items][<%=c%>][title]' value="" placeholder='請輸入規格' title="輸入200個字元以內"/>
    </td>
    </td>
  </tr>
  <tr>
    <td>內文</td>
    <td class="textleft">
      <input type='text' name='blocks[<%=i%>][items][<%=c%>][content]' value="" placeholder='請輸入內文' title="輸入內文"/>
    </td>
  </tr>
</script>

<script id='_block2' type='text/x-html-template'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style='margin: 15px auto;'>
    <tbody>
      <tr>
        <td bgcolor="#F7F7F7" width="80">標題</td>
        <td bgcolor="#F7F7F7" class="textleft">
          <input type="hidden" name='blocks[<%=index%>][type]' value='2' />
          <input type='text' value="" name='blocks[<%=index%>][title]' placeholder='請輸入標題' maxlength='255' title="輸入100個字元以內" >
          <div class='delete'>x</div>
        </td>
      </tr>
      <tr>
        <td width="80">內文</td>
        <td class="textleft">
          <label>
            <input type='hidden' name='blocks[<%=index%>][items][0][title]' value='' />
            <textarea placeholder='內文' name='blocks[<%=index%>][items][0][content]' cols="45" rows="5" title="輸入內文"></textarea>
          </label>
        </td>
      </tr>
    </tbody>
  </table>
</script>
