
@extends('frontend.dashboard.layouts.dashboard')

@section('styles')
    <link href="{{ asset('assets/plugins/dropzone/css/dropzone.css') }}" type="text/css" rel="stylesheet">
        {!! Html::style('css/bootstrap-datepicker.min.css') !!}

@endsection
@section('content')


                    <div class="static-content">
                        <div class="page-content">
                            <div class="container-fluid">
                            	<div class="row">
	                        		<div class="col-md-12">



                                        <div class="panel panel-default" style="margin-top: 20px;">
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active">

                                                        <form action="{{ route('press.store') }}" enctype="multipart/form-data" id="basicwizard" class="form-horizontal" method="POST">
                                                            {{ csrf_field() }}

                                                            <fieldset title="Guidelines">
                                                                <legend></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p>This category of evidence is for articles written about you, written by you, or featuring your work with editorial credit that have appeared in publications (either in print or online) with national or international circulations or readerships. We will be asking you to upload copies of these articles, as well as to provide information of the publications' circulations or readerships.</p>
                                                                        <p>Some things to keep in mind before you start:</p>
                                                                        <ul>
                                                                        <li><p style="font-weight: bold">Highlight or circle your name</p>
                                                                        <p>All articles provided for this category must mention you by name. Before you upload any article, it is important that you highlight or circle your name in the text of the article. If you're not sure how to highlight your name in a digital document, check out our <a href="#">resource on applications that let you highlight your name.</a></p></li>
                                                                        <li><p style="font-weight: bold">Screenshots</p>
                                                                        <p>Context is important for your evidence: that is, it is important that a person can tell where the text of an article comes from at a glance. For this reason, if you are providing articles from online publications, we suggest that you upload screenshots of these articles. If you don't know how to take a screenshot on your computer, see our <a href="#">resource for taking screenshots</a>.</p></li>
                                                                        <li><p style="font-weight: bold">Readership or circulation info</p>
                                                                        <p>Every article for this category must be accompanied by information regarding the circulation or readership figures for the publication in which it appeared. If you're not sure how to find this information, check out our <a href="#">resource for finding publication readership information</a>. Please not that Wikipedia cannot be used for this kind of documentation.</p></li>
                                                                        <li><p style="font-weight: bold">Translations</p>
                                                                        <p>As always, all documents not in English must be accompanied by translation, and this translation must be certified by the translator (though this translator needn't be a professional, you yourself cannot certify the translations for your own case). For more information regarding translations, check out our translations resource.</p></li>
                                                                        </ul>
                                                                        <p>We will begin by asking you to upload articles written about you, and after that we will ask you to upload any articles written by you, or featuring your work (such as your photography or designs) with editorial credit. You can upload up to ten articles about you and another ten articles by you.</p>
                                                                        <a href="#" class="btn btn-warning btn-block" style="width: 250px; margin-bottom: 20px; display: block; margin: 30px auto 30px auto;">My name has never appeared in print</a>
                                                                    </div>
                                                                </div>
                                                            </fieldset>



                                                          {{--  @if(!$questionnares->isEmpty())

                                                                @foreach($questionnares as $questionnare)



                                                                @endforeach


                                                            @endif--}}
                                                            <fieldset title="Articles written about you part 1">
                                                                <legend></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                                                        <h3>Articles written about you</h3>
                                                                        <p>You can upload up to ten articles written about you. These articles can either be entirely about you, or they can mention you in the context of a larger event.</p>
                                                                        <p>We recommend that you begin with the articles that you think are most impressive and work your way down through articles that you think are less impressive. (If you're not sure about how impressive your articles are, relative to one another, just use your best judgment.) Before you upload an article, be sure to highlight your name.</p>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">Select document to upload</label>
                                                                    <div class="col-md-12">
                                                                        <input type="file" name="doc_article" id="fileToUpload">
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 2">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">What is the title of this article?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name='article_title' type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 3">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">What is the name of the publication in which this article appeared?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name="publication_name" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 4">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">When was this article published?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name="publication_time" id='when_published' type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 5">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">What is the name of the article's author?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name="article_author" type="text" class="form-control">
                                                                        <div class="checkboxcontainer">
                                                                            <label class="checkbox-inline icheck">
                                                                                <input name="is_author_given" type="checkbox" id="inlinecheckbox1" value='no'> No author given
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 6">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">Is this article in English?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <select class="form-control" name="article_in_english" id="uploadtranslation">
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group uploadtranslationbox" id="no" style="display: none;">
                                                                    <label class="col-md-12 form-label">Upload a translation of the article with certification <a class="btn btn-default-alt btn-xs" data-toggle="modal" href="#tipuploadtranslation">?</a></label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input type="file" name="doc_article_translation" id="fileToUpload">
                                                                        {{--<a href="#" class="btn btn-default">Upload translation</a>--}}
                                                                        <div class="checkboxcontainer">
                                                                            <label class="checkbox-inline icheck">
                                                                                <input name="article_translation_back_later" type="checkbox" id="inlinecheckbox1" value="yes"> Come back to this later
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 7">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">Please upload evidence of the publication's circulation or readership <a class="btn btn-default-alt btn-xs" data-toggle="modal" href="#tipuploadevidence">?</a></label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name="doc_publication" type="file"  id="fileToUpload">
                                                                        {{--<a href="#" class="btn btn-default">Upload evidence</a>--}}
                                                                        <div class="checkboxcontainer">
                                                                            <label class="checkbox-inline icheck">
                                                                                <input name="publication_back_later" type="checkbox" id="inlinecheckbox1" value="yes"> Come back to this later
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 8">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">Is this document in English?</label>
                                                                    <div class="col-md-12 form-input">
                                                                        <select class="form-control" name="publication_in_english" id="uploadtranslation2">
                                                                            <option value="yes">Yes</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group uploadtranslationbox2" id="no2" style="display: none;">
                                                                    <label class="col-md-12 form-label">Upload a translation of the document with certification <a class="btn btn-default-alt btn-xs" data-toggle="modal" href="#tipuploadtranslation">?</a></label>
                                                                    <div class="col-md-12 form-input">
                                                                        <input name="doc_publication_translation" type="file" id="fileToUpload">
                                                                        {{--<a href="#" class="btn btn-default">Upload translation</a>--}}
                                                                        <div class="checkboxcontainer">
                                                                            <label class="checkbox-inline icheck">
                                                                                <input name="publication_translation_back_later" type="checkbox" id="inlinecheckbox1" value="yes"> Come back to this later
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset title="Articles written about you part 9">
                                                                <legend></legend>
                                                                <div class="form-group">
                                                                    <label class="col-md-12 form-label">Upload more articles?</label>
                                                                    <div class="col-md-12 form-input">
{{--                                                                        <a  href="{{ route('questionnare.submit') }}" class="btn btn-success">Save and add more articles</a>--}}
                                                                        <button type="submit"   class="btn btn-success">Save and add more articles</button>
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                            <fieldset title="Congratulations">
                                                                <legend></legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3 class="congratulations">Congratulations you've reached the end of this category</h3>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <input type="submit" class="finish btn-success btn" value="Save and return to categories home" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



	                        		</div>
	                        	</div>
                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>



        <!-- tipuploadtranslation Modal -->
        <div class="modal fade" id="tipuploadtranslation" tabindex="-1" role="dialog" aria-labelledby="tipuploadtranslation" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="font-weight: bold;">What is a translation with certification?</p>
                        <p>It's probably not as complicated as you think. See our <a href="#">translation guidelines</a> resource for everything you need to know about how to properly format your translation and have it certified by a friend.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- tipuploadevidence Modal -->
        <div class="modal fade" id="tipuploadevidence" tabindex="-1" role="dialog" aria-labelledby="tipuploadtranslation" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="font-weight: bold;">What is this?</p>
                        <p>The best evidence of a publication's circulation or readership is its media kit. For more information about how to find a publication's media kit, or for alternative sources of this kind of information that you can use in cases where a media kit is not available, see our resource for <a href="#">finding evidence of a publication's readership</a></p>
                        <p style="font-weight: bold;">Why are you asking me for this?</p>
                        <p>To be of value to your case, articles must be shown to have appeared in publications with national or international audiences.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

@endsection

@section('scripts')

<!-- Load page level scripts-->
<script src="{{ asset('assets/plugins/form-validation/jquery.validate.min.js') }}"></script>                   <!-- Validate Plugin -->
<script src="{{ asset('assets/plugins/form-stepy/jquery.stepy.js') }}"></script>                               <!-- Stepy Plugin -->
<script src="{{ asset('assets/demo/demo-formwizard.js') }}"></script>
<script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>



<script>
$(function() {

    $('#uploadtranslation').change(function(){
        $('.uploadtranslationbox').hide();
        $('#' + $(this).val()).show();
    });

});
$(function() {

    $('#uploadtranslation2').change(function(){
        $('.uploadtranslationbox2').hide();
        $('#' + $(this).val()).show();
    });

});
$(function() {

    $('#uploadtranslation3').change(function(){
        $('.uploadtranslationbox3').hide();
        $('#' + $(this).val()).show();
    });

});
$(function() {

    $('#uploadtranslation4').change(function(){
        $('.uploadtranslationbox4').hide();
        $('#' + $(this).val()).show();
    });

});
</script>
<!-- End loading page level scripts-->

<script>


    $(document).ready(function(){




            $('#when_published').datepicker({

                format: 'yyyy-mm-dd'
            });
    });





</script>

@endsection
