export class SetHeight {
  constructor () {
    this.setContentHeight()
  }

  setContentHeight () {
    $('#content').css('minHeight', $(window).height())
    let timeout = null

    $(window).on(
      'resize',
      function (e) {
        clearTimeout(timeout)
        timeout = setTimeout(
          function () {
            $('#content').css('minHeight', $(window).height())
          },
          200
        )
      }
    )
  }
}
