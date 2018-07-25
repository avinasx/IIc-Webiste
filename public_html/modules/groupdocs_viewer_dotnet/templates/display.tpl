
<head>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/jquery-1.9.1.min.js'></script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/jquery-ui-1.10.3.min.js'></script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/knockout-3.0.0.js'></script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/turn.min.js'></script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/modernizr.2.6.2.Transform2d.min.js'></script>
    <script type='text/javascript'>if (!window.Modernizr.csstransforms)   $.ajax({
            url: '{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=libs/turn.html4.min.js', dataType: 'script', type: 'GET', async: false});</script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=installableViewer.min.js'></script>
    <script type='text/javascript'>$.ui.groupdocsViewer.prototype.applicationPath = '{trim($params['server_url'])}';</script>
    <script type='text/javascript'>$.ui.groupdocsViewer.prototype.useHttpHandlers = {trim($params['use_handler'])};</script>
    <script type='text/javascript' src='{trim($params['server_url'])}document-viewer/GetScript{trim($params['handler'])}?name=GroupdocsViewer.all.min.js'></script>

    <link rel='stylesheet' type='text/css' href='{trim($params['server_url'])}document-viewer/CSS/GetCss{trim($params['handler'])}?name=bootstrap.css' />
    <link rel='stylesheet' type='text/css' href='{trim($params['server_url'])}document-viewer/CSS/GetCss{trim($params['handler'])}?name=GroupdocsViewer.all.min.css' />
    <link rel='stylesheet' type='text/css' href='{trim($params['server_url'])}document-viewer/CSS/GetCss{trim($params['handler'])}?name=jquery-ui-1.10.3.dialog.min.css' />
</head>
<body>
<div>
    <div id="test" style="width:{trim($params['width'])}px;height:{trim($params['height'])}px;overflow:hidden;position:relative;margin-bottom:20px;background-color:gray;border:1px solid #ccc;"></div>
    <script type="text/javascript">
        $(function () { var localizedStrings = null;
                        var thumbsImageBase64Encoded = null;
                        $('#test').groupdocsViewer({ filePath: '{trim($params['file_name'])}',
                                                    quality: 100,
                                                    showThumbnails: true,
                                                    openThumbnails: true,
                                                    initialZoom: 100,
                                                    zoomToFitWidth: true,
                                                    zoomToFitHeight: false,
                                                    width: {trim($params['width'])},
                                                    height: {trim($params['height'])},
                                                    backgroundColor: '',
                                                    showFolderBrowser: true,
                                                    showPrint: true,
                                                    showDownload: true,
                                                    showZoom: true,
                                                    showPaging: true,
                                                    showViewerStyleControl: true,
                                                    showSearch: true,
                                                    preloadPagesCount: 0,
                                                    viewerStyle: 1,
                                                    supportTextSelection: true,
                                                    usePdfPrinting: false,
                                                    localizedStrings: localizedStrings,
                                                    thumbsImageBase64Encoded: thumbsImageBase64Encoded,
                                                    toolbarButtonsBoxShadowStyle: '',
                                                    toolbarButtonsBoxShadowHoverStyle: '',
                                                    thumbnailsContainerBackgroundColor: '',
                                                    thumbnailsContainerBorderRightColor: '',
                                                    toolbarBorderBottomColor: '',
                                                    toolbarInputFieldBorderColor: '',
                                                    toolbarButtonBorderColor: '',
                                                    toolbarButtonBorderHoverColor: '',
                                                    thumbnailsContainerWidth: 0,
                                                    jqueryFileDownloadCookieName: 'jqueryFileDownloadJSForGD',
                                                    showDownloadErrorsInPopup: false,
                                                    showImageWidth: false,
                                                    showHeader: true,
                                                    minimumImageWidth: 0,
                                                    enableStandardErrorHandling: true,
                                                    useHtmlBasedEngine: true,
                                                    useImageBasedPrinting: true,
                                                    fileDisplayName: '',
                                                    downloadPdfFile: false,
                                                    searchForSeparateWords: false,
                                                    preventTouchEventsBubbling: false,
                                                    useInnerThumbnails: true,
                                                    watermarkText: '',
                                                    supportPageReordering: false,
                                                    watermarkFontSize: null,
                                                    watermarkColor: null,
                                                    watermarkLeft: null,
                                                    watermarkTop: null
                        });
        });
    </script>
</body>
