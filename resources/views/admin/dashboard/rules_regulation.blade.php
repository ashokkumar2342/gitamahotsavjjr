<div class="col-xs-12 c-test-instructions ng-scope" ng-class="{'railway-test-interface':isRailwayTestInterfaceUsed}" ng-show="showInstTab == 1" id="bank-instructions" ng-if="!instructionsJSON.isGateExam">
    <h4>General Instructions:</h4>
    <ol start="1">
        <li>
            <div ng-if="!instructionsJSON.hasSkippableSections" class="col-xs-12 col-sm-6 ng-scope">
                <b translate="TESTINSTRUCTIONDURATION" translate-values="{instructionsJSON: instructionsJSON}" class="ng-scope">Duration: 15 Mins
                </b>
            </div>
            <div ng-if="!instructionsJSON.hasSkippableSections" class="col-xs-12 col-sm-6 ng-scope">
                <b class="pull-right ng-binding">Maximum Marks: 30
                </b>
            </div>
            <div class="col-xs-12 col-sm-12 di-content">
                <div ng-if="instructionsJSON.instructionsArr" class="ng-scope">
                    <p>
                        <b translate="" class="ng-scope">Read the following instructions carefully.
                        </b>
                    </p>
                    <ol start="1" ng-if="instructionsJSON &amp;&amp; instructionsJSON.instructionsArr.length > 1 &amp;&amp; !instructionsJSON.isSourceCP" class="for-all-exams ng-scope">
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">The test contains 15 questions.</span>
                            </p>
                        </li>
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">Each question has 4 options out of which only one is correct.</span>
                            </p>
                        </li>
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">You have to finish the test in 15 minutes.</span>
                            </p>
                        </li>
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">
                                <p>You will be awarded 2&nbsp;marks for each correct answer and There is no negative marking.
                                </p></span>
                            </p>
                        </li>
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p>
                                <span ng-bind-html="parseHtml(ins.value)" class="ng-binding">There is no penalty for the questions that you have not attempted.</span>
                            </p>
                        </li>
                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                            <p>
                                <span ng-bind-html="parseHtml(ins.value)" class="ng-binding">
                                    <p>Once you start the test, you will not be allowed to reattempt it. Make sure that you complete the test&nbsp;before you submit the test&nbsp;and/or close the browser.</p>
                                </span>
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </li>
    </ol>
</div>